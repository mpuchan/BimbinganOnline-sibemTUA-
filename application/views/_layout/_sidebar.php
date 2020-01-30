<div id="sidebar" class="sidebar responsive ace-save-state sidebar-fixed" style="background-image:url('<?php echo base_url(); ?>assets/img/mahasiswa/<?php echo $userdata->profile; ?>'); height:100%; background-size:100vh;">
  <script type="text/javascript">
    try {
      ace.settings.loadState('sidebar')
    } catch (e) {}
  </script>

  <div class="sidebar-shortcuts" id="sidebar-shortcuts">
    <div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
      <button class="btn btn-success">
        <i class="ace-icon fa fa-signal"></i>
      </button>

      <button class="btn btn-info">
        <i class="ace-icon fa fa-pencil"></i>
      </button>

      <button class="btn btn-warning">
        <i class="ace-icon fa fa-users"></i>
      </button>

      <button class="btn btn-danger">
        <i class="ace-icon fa fa-cogs"></i>
      </button>
    </div>

    <div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
      <span class="btn btn-success"></span>

      <span class="btn btn-info"></span>

      <span class="btn btn-warning"></span>

      <span class="btn btn-danger"></span>
    </div>
  </div><!-- /.sidebar-shortcuts -->

  <?php if ($userdata->roleid == 1) {
  ?>
    <ul class="nav nav-list">

      <li <?php if ($page == 'home') {
            echo 'class="active"';
          } ?>>
        <a href="<?php echo base_url('Home'); ?>">
          <i class="menu-icon fa fa-home"></i>
          <span class="menu-text"> Dashboard </span>
        </a>
        <b class="arrow"></b>
      </li>
      <li <?php if ($page == 'User') {
            echo 'class="active"';
          } ?>>
        <a href="<?php echo base_url('User'); ?>">
          <i class="menu-icon fa fa-user "></i>
          <span class="menu-text"> User </span>
        </a>

        <b class="arrow"></b>
      </li>
      <li <?php if ($page == 'Mahasiswa') {
            echo 'class="active"';
          } ?>>
        <a href="<?php echo base_url('Mahasiswa'); ?>">
          <i class="menu-icon fa fa-graduation-cap "></i>
          <span class="menu-text"> Mahasiswa </span>
        </a>

        <b class="arrow"></b>
      </li>
      <li <?php if ($page == 'Dosen') {
            echo 'class="active"';
          } ?>>
        <a href="<?php echo base_url('Dosen'); ?>">
          <i class="menu-icon fa fa-graduation-cap "></i>
          <span class="menu-text"> Dosen </span>
        </a>

        <b class="arrow"></b>
      </li>
      <li <?php if ($page == 'Jurusan') {
            echo 'class="active"';
          } ?>>
        <a href="#" class="dropdown-toggle">
          <i class="menu-icon fa fa-university "></i>
          <span class="menu-text"> Jurusan </span>

          <b class="arrow fa fa-angle-down"></b>
        </a>

        <b class="arrow"></b>
        <ul class="submenu">
          <li <?php if ($page == 'Jurusan') {
                echo 'class="active"';
              } ?>>
            <a href="<?php echo base_url('Jurusan'); ?>">
              <i class="menu-icon fa fa-caret-right"></i>
              Data Jurusan
            </a>

            <b class="arrow"></b>
          </li>
        </ul>
        <ul class="submenu">
          <li <?php if ($page == 'Kajur') {
                echo 'class="active"';
              } ?>>
            <a href="<?php echo base_url('Kajur'); ?>">
              <i class="menu-icon fa fa-caret-right"></i>
              Data Kajur
            </a>

            <b class="arrow"></b>
          </li>
        </ul>
      </li>
      <li <?php if ($page == 'Prodi') {
            echo 'class="active"';
          } ?>>
        <a href="<?php echo base_url('Prodi'); ?>">
          <i class="menu-icon fa fa-university "></i>
          <span class="menu-text"> Prodi </span>
        </a>

        <b class="arrow"></b>
      </li>

    </ul>
    </li>
    </ul><!-- /.nav-list -->
  <?php
  } else if ($userdata->roleid == 2) {
  ?>
    <ul class="nav nav-list">
      <li <?php if ($page == 'home') {
            echo 'class="active"';
          } ?>>
        <a href="<?php echo base_url('Berandamahasiswa'); ?>">
          <i class="menu-icon fa fa-home"></i>
          <span class="menu-text"> Dashboard </span>
        </a>
        <b class="arrow"></b>
      </li>

    </ul><!-- /.nav-list -->

  <?php
  } ?>
  <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
    <i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
  </div>
</div>