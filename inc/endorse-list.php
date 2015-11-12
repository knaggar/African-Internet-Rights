<?php
/**
 * @package air
 * @since 2.0
 * @name Endorsement list from CF7
 */
function endorse_db(){
  require_once(ABSPATH . 'wp-content/plugins/contact-form-7-to-database-extension/CFDBFormIterator.php');
  $exp = new CFDBFormIterator();
  $exp->export('endorse', array('show' => 'name,country,organization,type'));
    while ($row = $exp->nextRow()) {
      echo '<div class="item-wrap">';
        if ($row['type'] == 'Organization') {
          echo '<div class="item-title org">' . $row['organization'] . '</div>';
        } else {
          echo '<div class="item-title ind">' . $row['name'] . '</div>';
        }
        if ($row['country'] == 'Other') {
          echo '<div class="country nafs">' . $row['country'] . '</div>';
        } else {
          echo '<div class="country afs">' . $row['country'] . '</div>';
        }
      echo '</div>';
   }
}
