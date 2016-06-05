<?php

/**
 * This file is part of Chelun coding standards.
 *
 * (c) chelun.com
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 *
 * Original code from phpBB Forum Software package
 *
 * @copyright (c) phpBB Limited <https://www.phpbb.com>
 * @license GNU General Public License, version 2 (GPL-2.0)
 */

/**
 * Checks that there is exactly one space between the keyword and the opening
 * parenthesis of a control structures.
 */
class Chelun_Sniffs_ControlStructures_OpeningParenthesisSniff implements PHP_CodeSniffer_Sniff
{
    /**
     * Registers the tokens that this sniff wants to listen for.
     */
    public function register()
    {
        return array(
            T_IF,
            T_FOREACH,
            T_WHILE,
            T_FOR,
            T_SWITCH,
            T_ELSEIF,
            T_CATCH,
        );
    }
    /**
     * Processes this test, when one of its tokens is encountered.
     *
     * @param PHP_CodeSniffer_File $phpcsFile The file being scanned.
     * @param int                  $stackPtr  The position of the current token in the
     *                                        stack passed in $tokens.
     *
     * @return void
     */
    public function process(PHP_CodeSniffer_File $phpcsFile, $stackPtr)
    {
        $tokens = $phpcsFile->getTokens();
        if ($tokens[$stackPtr + 1]['content'] === '(')
        {
            $error = 'There should be exactly one space between the keyword and opening parenthesis';
            $phpcsFile->addError($error, $stackPtr, 'NoSpaceBeforeOpeningParenthesis');
        }
        elseif ($tokens[$stackPtr + 1]['content'] !== ' ')
        {
            $error = 'There should be exactly one space between the keyword and opening parenthesis';
            $phpcsFile->addError($error, $stackPtr, 'IncorrectSpaceBeforeOpeningParenthesis');
        }
    }
}
