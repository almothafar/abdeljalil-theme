<?php
/**
 * TEMPORARY. Deliberately violates the rules AGENTS.md documents, to prove the
 * PHPCS job actually annotates rather than merely being configured. Removed in
 * the next commit on this branch.
 */

function ci_probe_output() {
    // Unescaped output of user input: WordPress.Security.EscapeOutput.
    echo $_GET['q'];

    // Loose comparison where AGENTS.md requires strict.
    if ( $_GET['q'] == 'x' ) {
        echo 'matched';
    }

    // A user-facing string with no text domain.
    esc_html_e( 'Untranslated string' );
}
