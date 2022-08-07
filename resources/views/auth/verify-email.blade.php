<table class="logs" data-filter-level="Emergency,Alert,Critical,Error,Warning,Notice,Info,Debug" data-filters>
<?php $channelIsDefined = isset($logs[0]['channel']); ?>
    <thead>
        <tr>
            <th data-filter="level">Level</th>
            <?php if ($channelIsDefined) { ?><th data-filter="channel">Channel</th><?php } ?>
            <th class="full-width">Message</th>
        </tr>
    </thead>

    <tbody>
    <?php
    foreach ($logs as $log) {
        if ($log['priority'] >= 400) {
            $status = 'error';
        } elseif ($log['priority'] >= 300) {
            $status = 'warning';
        } else {
            $severity = 0;
            if (($exception = $log['context']['exception'] ?? null) instanceof \ErrorException || $exception instanceof \Symfony\Component\ErrorHandler\Exception\SilencedErrorContext) {
                $severity = $exception->getSeverity();
            }
            $status = \E_DEPRECATED === $severity || \E_USER_DEPRECATED === $severity ? 'warning' : 'normal';
        } ?>
        <tr class="status-<?= $status; ?>" data-filter-level="<?= strtolower($this->escape($log['priorityName'])); ?>"<?php if ($channelIsDefined) { ?> data-filter-channel="<?= $this->escape($log['channel']); ?>"<?php } ?>>
            <td class="text-small nowrap">
                <span class="colored text-bold"><?= $this->escape($log['priorityName']); ?></span>
                <span cla