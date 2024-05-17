<?php

namespace Services;
class SelectedIdsService
{
    public static function selectIds($selectors) {
        foreach ($selectors as $selector) {
      if (isset($_GET[$selector->selection_id])) {
           $selectedIds[] = $selector->selection_id;
        }
    }
    return $selectedIds;
}

}