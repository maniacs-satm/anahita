<?php
defined( '_JEXEC' ) or die( 'Restricted index access' );

require_once('lib/missioncontrol.class.php');

global $mctrl;
$mctrl = MissionControl::getInstance();
$mctrl->initRenderer();
$mctrl->addStyle("core.css");
$mctrl->addStyle("menu.css");
$mctrl->addStyle("colors.css.php");

// load and init the MissioControl Class

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $mctrl->language; ?>" lang="<?php echo $mctrl->language; ?>" dir="<?php echo $mctrl->direction; ?>">
	<head>
		<link rel="icon" type="image/png" href="<?php print $mctrl->templateUrlAbsolute ?>/images/favicon.ico" />
		<jdoc:include type="head" />
	</head>
	<body id="mc-standard" class="<?php $mctrl->displayBodyTags(); ?>">
		<div id="mc-frame">
			<div id="mc-header">
				<div class="mc-wrapper">
					<div id="mc-status">
						<?php $mctrl->displayStatus(); ?>
					</div>
					<div id="mc-logo">
						<?php $mctrl->displayLogo(); ?>
						<h1><?php echo $mctrl->params->get('adminTitle') ? $mctrl->params->get('adminTitle') : JText::_('Administration'); ?></h1>
					</div>
					<div id="mc-nav">
						<?php $mctrl->displayMenu(); ?>
					</div>
					<div class="clr"></div>
				</div>
			</div>
			<div id="mc-body">
				<div class="mc-wrapper">
					
					<jdoc:include type="message" />
					
					<div id="mc-title">
						<?php $mctrl->displayTitle(); ?>
						<?php $mctrl->displayHelpButton(); ?>
						<?php $mctrl->displayToolbar(); ?>
						<div class="clr"></div>
					</div>
					
					<div id="mc-submenu">
						<?php $mctrl->displaySubMenu(); ?>
					</div>

					<?php if ($option == 'com_cpanel') : ?>
					<div id="mc-cpanel">
					<?php $mctrl->displayDashText(); ?>
					<?php endif; ?>
					
					<div id="mc-component">
						<jdoc:include type="component" />
					</div>
					
					<?php if ($option == 'com_cpanel') : ?>
					</div>					
					<?php endif; ?>
					
					<div class="clr"></div>
				</div>
			</div>	
			<div id="mc-footer">
				<div class="mc-wrapper">
					<p class="copyright">
						<span class="mc-footer-logo"></span>
						<a href="http://www.GetAnahita.com" target="_blank">Anahita Social Networking Platform and Framework</a>
						<?php echo JText::_('ISFREESOFTWARE') ?> - Anahita <?php echo  JText::_('Version') ?> <?php echo  Anahita::getVersion(); ?><br />
						<?php echo JText::_('MISSION_CONTROL_FOOTER') ?> (MC Version <?php echo CURRENT_VERSION; ?>)
					</p>
				</div>
			</div>
			<div id="mc-message">
				
			</div>
		</div>
	</body>
</html>

<script type="text/javascript" src="<?php print $mctrl->baseUrl ?>media/lib_anahita/js/vendors/jquery-2.1.1.js"></script>
<script type="text/javascript" src="<?php print $mctrl->baseUrl ?>media/lib_anahita/js/admin.js"></script>
