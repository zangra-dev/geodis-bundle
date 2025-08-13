<?php
declare(strict_types=1);

namespace GeodisBundle\Domain\Base;

/**
 * Author: Nils méchin <nils@zangra.com>
 * Author: Maxime Lambot <maxime@lambot.com>.
 */
abstract class Model
{
    public function toJson($skipNullValues = null): bool|string
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

    private function encodeLines($value)
    {
        $salesOrderLine = [];

        foreach ($value as $entryKey => $entry) {
            if ('url' === $entryKey || 'primaryKey' === $entryKey) {
                continue;
            }

            if (null === $entry) {
                continue;
            }

            if (in_array($entryKey, ['destinataire', 'expediteur', 'listUmgs'], true)) {
                $entry = $this->encodeSubLines($entry);
            }

            $salesOrderLine[$entryKey] = $entry;
        }

        return [$salesOrderLine];
    }

    private function encodeSubLines($entry)
    {
        $salesOrderLine = array();
        foreach ($entry as $entryKey => $entry) {
            if ('url' === $entryKey or 'primaryKey' === $entryKey) {
                continue;
            }
            if (null === $entry) {
                continue;
            }
            $salesOrderLine[$entryKey] = $entry;
        }
        return $salesOrderLine;
    }
}
