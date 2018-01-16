<br>
<br>


<span class="form-title">
	<?php echo lang_get( 'plugin_themeManager_help_title' )?>
</span>

<ol>
	<!-- Create themes folder -->
	<li>
		<?php if (!$error): ?><s><?php endif; ?>

		<?php echo lang_get( 'plugin_themeManager_help_li_1' ) ?>

		<?php if (!$error): ?></s><?php endif; ?>

		<?php
			$passed = $error ? "negative" : "positive";
			echo '<span class="' . $passed . '">' . $passed . '</span>';
		?>
	</li>
	<li>
		<?php echo lang_get( 'plugin_themeManager_help_li_2' ) ?>
	</li>
	<li>
		<?php echo lang_get( 'plugin_themeManager_help_li_3' ) ?>
	</li>
</ol>
