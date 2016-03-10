<?php
/**
 * The front page template file.
 *
 * If the user has selected a static page for their homepage, this is what will
 * appear. Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 *
 * @package components
 */
/**
 * Load pattern maker file.
 */
get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<section id="selection">
				<div class="types">
					<div class="svg-container">
						<?php echo file_get_contents( get_template_directory() . '/assets/img/type-crate.svg' ); ?>
					</div>
					<h2>Theme Types</h2>
					<p>Crafting an elegant online portfolio, an information-filled magazine theme or business site? We've got you covered with our pre-made starter themes. Just choose the type that fits the bill and you'll be on your way lickety split!</p>
					<a href="#theme-types-panel" class="toggle button">Choose a Type</a>
				</div>
				<div class="custom">
					<div class="svg-container">
						<?php echo file_get_contents( get_template_directory() . '/assets/img/toolbox.svg' ); ?>
					</div>
					<h2>Roll Your Own</h2>
					<p>If you like to have control over every element of your starter theme, take the reins and pick-and-choose only the precise components you need to create the perfect custom starter theme. No cruft, no muss.</p>
					<a href="#custom-build-panel" class="toggle button">Configure</a>
				</div>
			</section>
			<section id="theme-types-panel" class="panel">
				<section id="base">
					<div class="theme-type wrap" data-type="base">
						<div class="theme-image">
							<div class="standard-robot">
								<?php echo file_get_contents( get_template_directory() . '/assets/img/layout-base.svg' ); ?>
								<?php echo file_get_contents( get_template_directory() . '/assets/img/robot-base.svg' ); ?>
							</div>
							<div class="mobile-robot">
								<?php echo file_get_contents( get_template_directory() . '/assets/img/mobile-robot-base.svg' ); ?>
							</div>
						</div>
						<div class="theme-text">
							<h2 class="theme-type-title">Just the basics, please</h2>
							<p>Want to concoct your own starter theme? Don&rsquo;t need any bells or whistles? Our base package is for you.</p>
							<a href="#generator" class="download button" data-type="base">Build Theme!</a>
						</div>
					</div><!-- .theme-type -->

				</section><!-- #base -->

				<section id="types">
					<?php
						require get_template_directory() . '/components/theme-types.php';
						// Randomise order of types so as not to favour any in particular
						shuffle( $types );
						// Prepend the Base type
						// Iterate through each theme type and output formatted text
						$i = 0;
						foreach ( $types as $type ) :
							if ( 0 == $i % 2 ) {
								echo $i > 0 ? '</div>' : ''; // close div if it's not the first
								echo '<div class="wrap types-row">';
							}
							?>
							<div class="theme-type" data-type="<?php echo esc_attr( $type['filename'] ); ?>">
								<h2 class="theme-type-title"><?php echo $type['title']; ?></h2>
								<div class="theme-image">
									<div class="standard-robot">
										<?php echo file_get_contents( get_template_directory() . '/assets/img/layout-' . $type['filename'] . '.svg' ); ?>

										<?php echo file_get_contents( get_template_directory() . '/assets/img/robot-' . $type['filename'] . '.svg' ); ?>
									</div>
									<div class="mobile-robot">
										<?php echo file_get_contents( get_template_directory() . '/assets/img/mobile-robot-' . $type['filename'] . '.svg' ); ?>
									</div>
								</div>
								<div class="theme-text">
									<p><?php echo $type['text']; ?></p>
									<a href="#generator" class="download button" data-type="<?php echo esc_attr( $type['filename'] ); ?>">Build Theme!</a>
								</div>
							</div><!-- .theme-type -->

							<?php $i++; ?>
						<?php endforeach; ?>

						</div> <!-- .types-row -->

				</section><!-- #types -->

				<?php do_action( 'components_generator_print_form' ); ?>

			</section><!-- #theme-types-panel -->

			<section id="custom-build-panel" class="panel">
				Placeholder
			</section>

			<section id="extra-info">
				<div class="wrap">
					<div class="col">
						<h2>What&rsquo;s in the box?</h2>
						<p>Every Components package comes with:</p>
						<ul>
							<li>Design-agnostic layout patterns</li>
							<li>Well-organized SCSS</li>
							<li>Mobile-first layouts</li>
							<li>Mobile and desktop menus</li>
							<li>A simple base</li>
						</ul>
					</div>

					<div class="octocat-robot">
						<?php echo file_get_contents( get_template_directory() . '/assets/img/robot-octocat.svg' ); ?>
					</div>

					<div class="col">
						<h2>Want to contribute?</h2>
						<p>Components is a new project, and we&rsquo;re looking for your input! Have a pattern to share? Want to add a new feature? Found a bug in the code? Head over to the <a href="https://github.com/Automattic/theme-components">GitHub repo</a>, check out the <a href="https://github.com/Automattic/theme-components/blob/master/CONTRIBUTING.md">contributor guidelines</a>, and get involved!</p>

					</div>
				</div><!-- .wrap -->
			</section><!-- #extra-info -->

			<section id="contributors">
				<div class="wrap">
					<h2>Made with <?php echo file_get_contents( get_template_directory() . '/assets/img/love-and-labour.svg' ); ?> by</h2>
					<ul id="github-contributors">
						<?php foreach ( components_get_contributors() as $contributor ) : ?>
							<?php
								$name = '@' . $contributor->login;
								$contributions = sprintf( '%d %s', $contributor->contributions, _n( 'contribution', 'contributions', $contributor->contributions ) );
								$url = sprintf( 'http://github.com/%s', $contributor->login );
								$avatar_url = add_query_arg( 's', 280, $contributor->avatar_url );
								$avatar_url = add_query_arg( 'd', esc_url_raw( 'https://secure.gravatar.com/avatar/ad516503a11cd5ca435acc9bb6523536?s=280' ), $avatar_url );
							?>
							<li><a href="<?php echo esc_url( $url ); ?>"><img class="avatar" src="<?php echo esc_url( $avatar_url ); ?>" alt="" /><div class="contributor"><?php echo esc_html( $name ); ?><span><?php echo esc_html( $contributions ); ?></span></div></a></li>
						<?php endforeach; ?>
					</ul><!-- #team -->
				</div><!-- .wrap -->
			</section><!-- #contribute -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
