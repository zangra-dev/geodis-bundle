<?php

namespace GeodisBundle\Model\Base;

/**
 * Author: Nils méchin <nils@zangra.com>
 * Author: Maxime Lambot <maxime@lambot.com>.
 */
abstract class Model
{
    public function toJson($skipNullValues = null)
    {
        $json = array();
        foreach ($this as $key => $value) {
            if ('url' === $key or 'primaryKey' === $key) {
                continue;
            }

            if (null === $value) {
                continue;
            }

            // If an array of entity is passed to the json, it squizzed it,
            // rebuild an proper array without being entity and pass it to the $json array
            // if ('KeyArray' == $key) {
            //     $value = $this->encodeLines($value);
            // }

            $json[$key] = $value;
        }

        return json_encode($json);
    }

    private function encodeLines($value)
    {
        $salesOrderLines = array();
        foreach ($value as $line) {
            $salesOrderLine = array();
            foreach ($line as $entryKey => $entry) {
                if ('url' === $entryKey or 'primaryKey' === $entryKey) {
                    continue;
                }
                if (null === $entry) {
                    continue;
                }
                $salesOrderLine[$entryKey] = $entry;
            }
            array_push($salesOrderLines, $salesOrderLine);
        }

        return $salesOrderLines;
    }
}
