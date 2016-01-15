<?php
if (is_singular('series')) {
	
	dynamic_sidebar('sidebar-series');
} else {
	dynamic_sidebar('sidebar-primary');
}

