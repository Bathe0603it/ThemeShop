<section class="msgInfo">
    <?php if ($this->session->has_userdata('msg_success')): ?>
        <div class="msg msg-success">
            <?php echo $this->session->flashdata('msg_success'); ?>
        </div>
    <?php endif ?>
    <?php if ($this->session->has_userdata('msg_warning')): ?>
        <div class="msg msg-warning">
            <?php echo $this->session->flashdata('msg_warning'); ?>
        </div>
    <?php endif ?>
    <?php if ($this->session->has_userdata('msg_warnings')): ?>
        <div class="msg msg-warning">
            <?php $msg_warnings = $this->session->flashdata('msg_warnings'); ?>
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
    
</script>