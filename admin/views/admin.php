<?php
/**
 * Represents the view for the administration dashboard.
 * @package   G_Social_Icons
 * @author    Gerben Van Amstel <gerbenvanamstel@gmail.com>
 * @license   GPL-2.0+
 * @link      http://www.gerbenvanamstel.com
 * @copyright 2015 Gerben Van Amstel
 */
?>

<div class="wrap">

    <h2><?php echo esc_html( get_admin_page_title() ); ?></h2>
    
    <p>Only fill out the URL’s for the icons which you want displayed, you can also change the type of icons (square/circle/rounded), set the size, margin and colour of the icons. If you leave the Icon Colour field empty the plugin will use the original default colours.</p>
    <hr>
    <form method="post" action="options.php">
        <table class="form-table">
            <?php settings_fields( 'g-social-icons' );
do_settings_sections( 'g-social-icons' ); ?>
            <tbody>
                <tr>
                    <td>
                        <h3>Social Media URL's</h3>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="facebook">Facebook</label></th>
                    <td><input name="facebook" type="text" id="facebook" value="<?php echo esc_attr( get_option('facebook') ); ?>" placeholder="Your Facebook URL" class="regular-text"></td>
                </tr>
                <tr>
                    <th scope="row"><label for="twitter">Twitter</label></th>
                    <td><input name="twitter" type="text" id="twitter" value="<?php echo esc_attr( get_option('twitter') ); ?>" placeholder="Your Twitter URL" class="regular-text"></td>
                </tr>
                <tr>
                    <th scope="row"><label for="googleplus">Google+</label></th>
                    <td><input name="googleplus" type="text" id="googleplus" value="<?php echo esc_attr( get_option('googleplus') ); ?>" placeholder="Your Google+ URL" class="regular-text"></td>
                </tr>
                <tr>
                    <th scope="row"><label for="youtube">YouTube</label></th>
                    <td><input name="youtube" type="text" id="youtube" value="<?php echo esc_attr( get_option('youtube') ); ?>" placeholder="Your YouTube URL" class="regular-text"></td>
                </tr>
                <tr>
                    <th scope="row"><label for="pinterest">Pinterest</label></th>
                    <td><input name="pinterest" type="text" id="pinterest" value="<?php echo esc_attr( get_option('pinterest') ); ?>" placeholder="Your Pinterest URL" class="regular-text"></td>
                </tr>
                <tr>
                    <th scope="row"><label for="LinkedIn">LinkedIn</label></th>
                    <td><input name="linkedin" type="text" id="linkedin" value="<?php echo esc_attr( get_option('linkedin') ); ?>" placeholder="Your LinkedIn URL" class="regular-text"></td>
                </tr>
                <tr>
                    <th scope="row"><label for="tumblr">Tumblr</label></th>
                    <td><input name="tumblr" type="text" id="tumblr" value="<?php echo esc_attr( get_option('tumblr') ); ?>" placeholder="Your Tumblr URL" class="regular-text"></td>
                </tr>
                <tr>
                    <th scope="row"><label for="instagram">Instagram</label></th>
                    <td><input name="instagram" type="text" id="instagram" value="<?php echo esc_attr( get_option('instagram') ); ?>" placeholder="Your Instagram URL" class="regular-text"></td>
                </tr>
                <tr>
                    <th scope="row"><label for="flickr">Flickr</label></th>
                    <td><input name="flickr" type="text" id="flickr" value="<?php echo esc_attr( get_option('flickr') ); ?>" placeholder="Your Flickr URL" class="regular-text"></td>
                </tr>
                <tr>
                    <th scope="row"><label for="vine">Vine</label></th>
                    <td><input name="vine" type="text" id="vine" value="<?php echo esc_attr( get_option('vine') ); ?>" placeholder="Your Vine URL" class="regular-text"></td>
                </tr>
                <tr>
                    <th scope="row"><label for="soundcloud">Soundcloud</label></th>
                    <td><input name="soundcloud" type="text" id="soundcloud" value="<?php echo esc_attr( get_option('soundcloud') ); ?>" placeholder="Your Soundcloud URL" class="regular-text"></td>
                </tr>
                <tr>
                    <th scope="row"><label for="github">Github</label></th>
                    <td><input name="github" type="text" id="github" value="<?php echo esc_attr( get_option('github') ); ?>" placeholder="Your Github URL" class="regular-text"></td>
                </tr>
                <tr>
                    <th scope="row"><label for="dribble">Dribble</label></th>
                    <td><input name="dribble" type="text" id="dribble" value="<?php echo esc_attr( get_option('dribble') ); ?>" placeholder="Your Dribble URL" class="regular-text"></td>
                </tr>
                <tr>
                    <th scope="row"><label for="behance">Behance</label></th>
                    <td><input name="behance" type="text" id="behance" value="<?php echo esc_attr( get_option('behance') ); ?>" placeholder="Your Behance URL" class="regular-text"></td>
                </tr>
                <tr>
                    <th scope="row"><label for="rss">RSS</label></th>
                    <td><fieldset><legend class="screen-reader-text"><span>RSS</span></legend><label for="rss">
                        <input name="rss" type="checkbox" id="rss" value="1" <?php checked( '1', get_option( 'rss' ) ); ?>>
                        Show RSS icon (<?php echo get_site_url(); ?>/rss/)</label>
                        </fieldset>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h3>Display Settings</h3>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="border_radius">Type</label></th>
                    <td>
                        <select name="border_radius" id="border_radius">
                            <option>Select type</option>
                            <option value="square" <?php selected( get_option('border_radius'), 'square' ); ?>>Square</option>
                            <option value="circle" <?php selected( get_option('border_radius'), 'circle' ); ?>>Circle</option>
                            <option value="rounded" <?php selected( get_option('border_radius'), 'rounded' ); ?>>Rounded</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="alignment">Alignment</label></th>
                    <td>
                        <select name="alignment" id="alignment">
                            <option>Select alignment</option>
                            <option value="left" <?php selected( get_option('alignment'), 'left' ); ?>>Left</option>
                            <option value="right" <?php selected( get_option('alignment'), 'right' ); ?>>Right</option>
                            <option value="center" <?php selected( get_option('alignment'), 'center' ); ?>>Center</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="width_height">Size</label></th>
                    <td><input name="width_height" type="text" id="width_height" value="<?php echo esc_attr( get_option('width_height', '35px') ); ?>" placeholder="e.g. 35px" class="regular-text"></td>
                </tr>
                <tr>
                    <th scope="row"><label for="margin">In-between Margin</label></th>
                    <td><input name="margin" type="text" id="margin" value="<?php echo esc_attr( get_option('margin', '5px') ); ?>" placeholder="e.g. 5px" class="regular-text"></td>
                </tr>
                <tr>
                    <th scope="row"><label for="behance">Colour</label></th>
                    <td><input name="colour" type="text" id="colour" value="<?php echo esc_attr( get_option('colour') ); ?>" placeholder="e.g. #6441a5" class="regular-text"></td>
                </tr>

            </tbody>
        </table>
        <?php submit_button(); ?>
    </form>
        <hr>
        <h5>Author: Gerben Van Amstel
        <br>Email: gerbenvanamstel@gmail.com
        <br>Website: http://www.gerbenvanamstel.com
        <br>Version: 1.1
    </h5>
</div>
