<?php if ( is_network_admin() || !is_multisite() ) { ?>

    <?php
    $extensions         = pp_extensions();
    $enabled_extensions = self::get_enabled_extensions();
    ?>

    <table class="form-table">
        <tbody>
            <tr valign="top">
                <th scope="row" valign="top">
                    <?php _e('Row Extensions', 'bb-powerpack'); ?>
                </th>
                <td>
                    <?php foreach ( $extensions['row'] as $extension => $name ) :
                        $checked = ( array_key_exists($extension, $enabled_extensions['row']) || in_array( $extension, $enabled_extensions['row'] ) ) ? 'checked="checked"' : '';  ?>
                    <p>
                        <label>
                            <input type="checkbox" name="bb_powerpack_extensions[row][]" value="<?php echo $extension; ?>" <?php echo $checked; ?> />
                            <?php echo $name; ?>
                        </label>
                    </p>
                    <?php endforeach; ?>
                </td>
            </tr>
            <tr valign="top">
                <th scope="row" valign="top">
                    <?php _e('Column Extensions', 'bb-powerpack'); ?>
                </th>
                <td>
                    <?php foreach ( $extensions['col'] as $extension => $name ) :
                        $checked = ( array_key_exists($extension, $enabled_extensions['col']) || in_array( $extension, $enabled_extensions['col'] ) ) ? 'checked="checked"' : ''; ?>
                    <p>
                        <label>
                            <input type="checkbox" name="bb_powerpack_extensions[col][]" value="<?php echo $extension; ?>" <?php echo $checked; ?> />
                            <?php echo $name; ?>
                        </label>
                    </p>
                    <?php endforeach; ?>
                </td>
            </tr>

        </tbody>
    </table>

    <?php submit_button(); ?>
    <?php wp_nonce_field('pp-extensions', 'pp-extensions-nonce'); ?>

<?php } ?>
