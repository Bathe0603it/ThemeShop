<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?php echo admin_public_url();?>images/icon/1.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>Alexander Pierce</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
                </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <?php if ($permissions): ?>
                <?php foreach ($permissions as $key => $value): ?>
                    <?php
                        $name_record = $value['name'];
                        $link_record = base_url($value['permission']).''; 
                        $id_record   = $value['id'];
                    ?>
                    <li class="treeview">
                        <a href="<?php echo $link_record; ?>">
                        <i class="fa fa-files-o"></i>
                        <span><?php echo $name_record; ?></span>
                        <span class="pull-right-container">
                        <span class="label label-primary pull-right"><?php echo count($value['children'])-1>0?count($value['children'])-1:'' ?></span>
                        </span>
                        </a>
                        <?php if ($value['children']): ?>
                            <ul class="treeview-menu">
                            <?php foreach ($value['children'] as $key1 => $value1): ?>
                                <?php
                                    $name_record = $value1['name'];
                                    $link_record = base_url($value1['permission']).''; 
                                    $id_record   = $value1['id'];
                                    unset($value1['info']);
                                ?>
                                <li><a href="<?php echo $link_record; ?>"><i class="fa fa-circle-o"></i> <?php echo $name_record; ?></a></li>
                            <?php endforeach ?>
                            </ul>
                        <?php endif ?>
                    </li>
                <?php endforeach ?>
            <?php endif ?>
            
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>