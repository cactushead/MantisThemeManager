<?php
/* edited by Samunosuke to meet MantisBT 2.x api changes */
auth_reauthenticate( );
access_ensure_global_level(config_get('manage_plugin_threshold'));
layout_page_header(lang_get('plugin_themeManager_title'));
layout_page_begin();
print_manage_menu();
// Variables
$error = false;
// Load available themes
$themes = getThemes($error);
?>

<style type="text/css">
	/*Theme Manager specific css*/
    .theme-name-active { font-weight: bold; }

    #themelist img {
        width: 200px;
        border: 3px solid #fff;
        overflow-y: hidden;
        -webkit-border-radius: 3px;
           -moz-border-radius: 3px;
                border-radius: 3px;
        -webkit-box-shadow: 2px 2px 10px #777;
           -moz-box-shadow: 2px 2px 10px #777;
                box-shadow: 2px 2px 10px #777;
        -webkit-transition: all .3s ease-in-out;
           -moz-transition: all .3s ease-in-out;
            -ms-transition: all .3s ease-in-out;
             -o-transition: all .3s ease-in-out;
                transition: all .3s ease-in-out;
    }

    #themelist img:hover {
        -webkit-transform: scale(1.8);
           -moz-transform: scale(1.8);
            -ms-transform: scale(1.8);
             -o-transform: scale(1.8);
                transform: scale(1.8);
    }

	.widget-title {
		font-size: 1.71428571em !important;
		font-style: inherit !important;
		font-weight: 500 !important;
		letter-spacing: -.01em !important;
		line-height: 1.16666667 !important;
		margin-top: 28px !important;
		color: #172B4D !important;
	}

	.widget-header { color: #0052CC !important; }

	.badge,
	.label {
		font-weight: 400 !important;
		background-color: #42526E !important;
		text-shadow: none !important;
	}

	.label.arrowed-in:before,
	.label.arrowed:before {
		border-right-color: #42526E !important;
	}

	.widget-color-blue2 { border-color: #fff !important;	}

	.table-bordered,
	.table-bordered>tbody>tr>td,
	.table-bordered>tbody>tr>th,
	.table-bordered>tfoot>tr>td,
	.table-bordered>tfoot>tr>th,
	.table-bordered>thead>tr>td,
	.table-bordered>thead>tr>th {
		border: 0px !important;
	}

	.table-striped>tbody>tr:nth-of-type(odd) { background-color: #fff !important; }

	.widget-body .table.table-bordered thead:first-child>tr {
		border-top: 0px !important;
		border-bottom: 2px solid #DFE1E6 !important;
	}

	.widget-title .badge { background-color: #ABBAC3 !important; }

	.widget-color-blue2>.widget-header {
		background: #fff !important;
		border-color: #fff !important;
	}

	#themelist>tbody>tr:last-child { border-bottom: 2px solid #DFE1E6 !important; }

	.negative,
	.positive {
		color: #fff;
		padding: 0 10px;
		margin-left: 5px;
	}

	.negative { background-color: #dc3c36; }
	.positive { background-color: #27ae60; }

	.row-1 td,
	.row-2 td {
		padding: 20px !important;
	}

	.row-1 img,
	.row-2 img {
		width: 200px;
	}

	.row-category td {
		text-align: center !important;
		color: #42526E !important;
	}

	.form-title {
		font-size: 20px;
		padding-bottom: 20px !important;
		text-align: center !important;
	}

	td.category, th.category { background-color: #fff !important; }
</style>

<br />

<form id="bug_action" action="<?php echo plugin_page( 'config_edit' )?>" method="post">

	<div class="widget-box widget-color-blue2">
		<div class="widget-header widget-header-small">
			<div class="widget-body">

				<!-- Title -->
				<h4 class="widget-title lighter">
					<i class="ace-icon fa fa-columns"></i>
						<?php echo lang_get( 'plugin_themeManager_title' ); ?>
					<span class="badge">
						<?php echo lang_get( 'plugin_themeManager_config' )?>
					</span>
				</h4>

				<!-- Choose Theme -->
				<table id="themelist" class="table table-striped table-bordered table-condensed table-hover" style="width:600px;">
					<thead>
						<tr>
							<th class="category" style="width:250px;"><?php echo lang_get('plugin_themeManager_category_row_theme'); ?></th>
							<th class="category" style="width:50px;"><?php echo lang_get('plugin_themeManager_category_row_selected'); ?></th>
							<th class="category" style="width:250px; padding-left: 20px;"><?php echo lang_get('plugin_themeManager_category_row_preview'); ?></th>
							<th class="category" style="width:50px;"></th>
						</tr>
					</thead>

					<tbody>
						<?php foreach ($themes as $theme): ?>
							<tr <?php echo helper_alternate_class()?>>
								<td class="row-category center theme-name<?php if ($theme['isActive']) {echo "-active";} ?>" >
									<?php echo $theme['name']; ?>
								</td>
								<td class="center" >
									<label>
										<input
											type="radio"
											name="active_theme"
											value="<?php echo $theme['name'];?>"
											<?php if ($theme['isActive']) { ?>
												checked="checked"
											<?php } ?>
										/>

										<?php if ($theme['isActive']): ?>
											<span class="required"></span>
										<?php endif; ?>
									</label>
								</td>
								<td class="right">
									<a href="<?php echo $theme['img']; ?>">
										<img src="<?php echo $theme['img']; ?>" alt="<?php echo $theme['name'];?>" title="<?php echo lang_get('plugin_themeManager_preview'); ?>">
									</a>
								</td>
								<td style="vertical-align: middle; z-index: -100;">
									<?php if ($theme['isActive']): ?>
										<span class="label hidden-xs label-default arrowed">active theme</span>
									<?php endif; ?>
								</td>
							</tr>
						<?php endforeach ?>
					</tbody>

				</table>

				<input tabindex="22" type="submit" class="btn btn-primary btn-white btn-round" value="<?php echo lang_get( 'plugin_themeManager_choose' )?>">


			</div>
		</div>
	</div>
</form>

<?php
    // Show some help
    include('help.php');
?>

<?php
layout_page_end();
/* functions */
/**
 * Get all local themes
 */
function getThemes(&$error) {
    $active_theme = plugin_config_get('active_theme');
    $themes_path = getcwd() . "/css/themes/";
    $themes = array();
    // Add default theme
    $themes[] = array(
        'name' => 'default',
        'img' => "./css/themes/default/default.png",
        'isActive' => $active_theme == 'default'
    );
    // Load themes from css/themes
    if (file_exists($themes_path)) {
        if ($handle = opendir($themes_path)) {
            while (false !== ($theme_name = readdir($handle))) {
                if ($theme_name !== '.' && $theme_name !== '..' && $theme_name !== 'default') {
                    $themes[] = array(
                        'name' => $theme_name,
                        'img' => "./css/themes/$theme_name/" . $theme_name . ".png",
                        'isActive' => $active_theme == $theme_name
                    );
                }
            }
            closedir($handle);
        }
    // Create the "themes" folder first
    } else {
        // Bullshit, I know
        $error = true;
    }
    return $themes;
}
