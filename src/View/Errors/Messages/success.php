<?php
/**
 * @var array $message
 */
?>

<?php if(isset($message) && !empty($message)): ?>

<script>
    $.notify({
        message: <?php echo "'" . $message['message'] . "'"; ?>
    },{
        type: 'success'
    });
</script>

<?php endif; ?>