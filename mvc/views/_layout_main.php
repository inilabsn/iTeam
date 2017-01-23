<?php $this->load->view("include/inc_header"); ?>
<?php $this->load->view("include/inc_topbar"); ?>
<?php $this->load->view("include/inc_sidebar"); ?>        
    <!-- Right side column. Contains the navbar and content of the page -->
    <aside class="right-side">
        <!-- Content Header > main content header -->
        <?php $this->load->view($subview); ?>
    </aside><!-- /.right-side -->
</div><!-- ./wrapper -->

<?php $this->load->view("include/inc_footer"); ?>


