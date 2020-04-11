
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?= base_url('assets/dist/img/'.$user['foto']) ?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?= $user['username'] ?></p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">ADMINISTRATOR</li>
        <!-- Optionally, you can add icons to the links -->
        <!-- foreach data menu -->
        <?php foreach ($menu as $m) : ?>
        <?php $submenu = $this->a->submenu($m['id']); ?>
        <?php if($submenu) : ?>
        <?php
        if ($m['title'] == $subtitle) {
          echo '<li class="treeview active">';
        } else {
          echo '<li class="treeview">';
        }
        ?>
          <a href="<?= base_url($m['url']) ?>"><i class="<?= $m['icon'] ?>"></i> <span><?= $m['title'] ?></span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <?php foreach($submenu as $sm) : ?>
            <?php if($sm['title'] == $title) : ?>
            <li class="active"><a href="<?= base_url($sm['url']) ?>"><i class="<?= $sm['icon'] ?>"></i><?= $sm['title'] ?></a></li>
            <?php else : ?>
            <li><a href="<?= base_url($sm['url']) ?>"><i class="<?= $sm['icon'] ?>"></i><?= $sm['title'] ?></a></li>
            <?php endif; ?>
            <?php endforeach; ?>
          </ul>
        </li>
        <?php else : ?>
        <!-- kondisi jika aktif -->
        <?php if($m['title'] == $title) : ?>
        <li class="active"><a href="<?= base_url($m['url']) ?>"><i class="<?= $m['icon'] ?>"></i> <span><?= $m['title'] ?></span></a></li>
        <?php else : ?>
        <li><a href="<?= base_url($m['url']) ?>"><i class="<?= $m['icon'] ?>"></i> <span><?= $m['title'] ?></span></a></li>
        <?php endif; ?>
        <!-- penutup kondisi jika aktif -->
        <?php endif; ?>
        <?php endforeach; ?>
        <!-- Endforeach data menu -->
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>