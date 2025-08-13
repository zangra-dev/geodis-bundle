<?php
declare(strict_types=1);

namespace GeodisBundle\Domain\Base;

/**
 * Author: Nils méchin <nils@zangra.com>
 * Author: Maxime Lambot <maxime@lambot.com>.
 */
abstract class Model
{
    public function toJson(): bool|string
    {
        $json = array();
        foreach ($this as $key => $value) {
            if ('url' === $key || 'primaryKey' === $key) {
                continue;
            }

            if (null === $value) {
                continue;
            }

            // If an array of entity is passed to the json, it squizzed it,
            // rebuild an proper array without being entity and pass it to the $json array
            if ('listEnvois' == $key) {
                $value = $this->encodeLines($value);
            }

            $json[$key] = $value;
        }

        return json_encode($json);
    }

    private function encodeLines($value): array
    {
        $salesOrderLine = [];

        foreach ($value as $entryKey => $entry) {
            if ('url' === $entryKey || 'primaryKey' === $entryKey) {
                continue;
            }

            if (null === $entry) {
                continue;
            }

            if (in_array($entryKey, ['destinataire', 'expediteur'], true)) {
                $entry = $this->encodeSubLines($entry);
            }

            // Liste d’objets (important pour Geodis !)
            if ($entryKey === 'listUmgs') {
                $entry = $this->encodeMultipleSubLines($entry);
            }

            $salesOrderLine[$entryKey] = $entry;
        }

        return [$salesOrderLine];
    }

    private function encodeSubLines($entry): array
    {
        $salesOrderLine = array();
        foreach ($entry as $entryKey => $value) {
            if ('url' === $entryKey or 'primaryKey' === $entryKey) {
                continue;
            }
            if (null === $value) {
                continue;
            }
            $salesOrderLine[$entryKey] = $value;
        }
        return $salesOrderLine;
    }

    private function encodeMultipleSubLines($entries): array
    {
        $lines = [];

        // Si c’est un seul élément (non tableau), on le met dans un tableau
        if (!is_array($entries) || array_keys($entries) === range(0, count($entries) - 1)) {
            // c’est déjà un tableau d’objets, on ne change rien
        } else {
            // c’est un seul objet, on le met dans un tableau
            $entries = [$entries];
        }

        foreach ($entries as $entry) {
            $cleaned = [];

            foreach ($entry as $key => $value) {
                if ($value === null || $key === 'url' || $key === 'primaryKey') {
                    continue;
                }
                $cleaned[$key] = $value;
            }

            $lines[] = $cleaned;
        }

        return $lines;
    }
}
