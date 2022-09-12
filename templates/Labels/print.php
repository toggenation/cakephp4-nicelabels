<?php

/**
 * @var \App\View\AppView $this
 */
?>

<ul>
    <?php foreach ($links as $link) : ?>
        <li style="list-style-type:none;">
            <?= $this->Form->postButton($link, [
                'action' => $link
            ], [
                'confirm' => "Do you want to submit via {$link}?"
            ]); ?></li>
    <?php endforeach; ?>
</ul>