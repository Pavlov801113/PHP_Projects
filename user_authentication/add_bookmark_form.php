<?php
require_once('bookmark_functions.php');
session_start();
html_header('Add Bookmark');
check_valid_user();
display_add_bm_form();
display_user_menu();
html_footer();