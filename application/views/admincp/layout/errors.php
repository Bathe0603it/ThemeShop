<section class="msgInfo">
    <?php if ($this->system->hasFlash('msg_success')): ?>
        <div class="msg msg-success">
            <?php echo $this->system->flash('msg_success'); ?>
        </div>
    <?php endif ?>
    <?php if ($this->system->hasFlash('msg_warning')): ?>
        <div class="msg msg-warning">
            <?php echo $this->system->flash('msg_warning'); ?>
        </div>
    <?php endif ?>
    <?php if ($this->system->hasFlash('msg_error')): ?>
        <div class="msg msg-error">
            <?php echo $this->system->flash('msg_error'); ?>
        </div>
    <?php endif ?>
    <?php if ($this->system->hasFlash('msg_warnings')): ?>
        <div class="msg msg-warning">
            <?php $msg_warnings = $this->system->flash('msg_warnings'); ?>
            <ul>
                <?php foreach ($msg_warnings as $key => $value): ?>
                    <li>
                        <?php echo $value; ?>
                    </li>
                <?php endforeach ?>
            </ul>
        </div>
    <?php endif ?>
</section>
<script type="text/javascript">
    var do_action_msg = function(){
        $('.msgInfo').hide('slow');
    };
    setTimeout(do_action_msg, 5000);
</script>