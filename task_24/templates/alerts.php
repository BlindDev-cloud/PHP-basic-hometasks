<?php

require_once __DIR__.'/../functions/alerts.php';

$alerts= get_alerts();

?>

<?php if(!empty($alerts)): ?>

    <div class="mb-3">

        <?php foreach ($alerts as $alert): ?>

      <div class="alert <?php echo $alert['type']; ?>">

          <?php echo $alert['text']; ?>

      </div>

      <?php endforeach;; ?>

    </div>

    <?php flush_alerts(); ?>

<?php endif; ?>
