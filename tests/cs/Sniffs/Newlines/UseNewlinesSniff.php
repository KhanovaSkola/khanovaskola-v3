<?php

/**
 * @category PHP
 * @package Clevis\Sim
 */
class cs_Sniffs_Newlines_UseNewlinesSniff implements PHP_CodeSniffer_Sniff
{

	/**
	 * Returns the token types that this sniff is interested in.
	 *
	 * @return array(int)
	 */
	public function register()
	{
		return array(T_USE);
	}

	/**
	 * Processes the tokens that this sniff is interested in.
	 *
	 * @param PHP_CodeSniffer_File $phpcsFile The file where the token was found.
	 * @param int                  $stackPtr  The position in the stack where
	 *                                        the token was found.
	 *
	 * @return void
	 */
	public function process(PHP_CodeSniffer_File $phpcsFile, $stackPtr)
	{
		$tokens = $phpcsFile->getTokens();
		if ($this->_shouldIgnoreUse($phpcsFile, $stackPtr))
		{
			return;
		}

		$nextUse = $phpcsFile->findNext(T_USE, ($stackPtr + 1), null, false);
		if (!$nextUse || $this->_shouldIgnoreUse($phpcsFile, $nextUse))
		{
			return;
		}

		$newlines = 0;
		for ($ptr = $stackPtr + 2; $ptr < $nextUse; ++$ptr)
		{
			$space = $tokens[$ptr];
			if ($space['type'] !== 'T_WHITESPACE')
			{
				continue;
			}
			if (strpos("\n", $space['content']) !== false)
			{
				$newlines++;
			}
		}

		if ($newlines !== 1)
		{
			$error = 'Extraneous newline after use';
			$phpcsFile->addError($error, $ptr, 'ExtraneousNewline');
		}
	}

	/**
	 * Check if this use statement is part of the namespace block.
	 *
	 * @param PHP_CodeSniffer_File $phpcsFile The file being scanned.
	 * @param int                  $stackPtr  The position of the current token in
	 *                                        the stack passed in $tokens.
	 *
	 * @return boolean
	 */
	private function _shouldIgnoreUse(PHP_CodeSniffer_File $phpcsFile, $stackPtr)
	{
		$tokens = $phpcsFile->getTokens();

		// Ignore USE keywords inside closures.
		$next = $phpcsFile->findNext(T_WHITESPACE, ($stackPtr + 1), null, true);
		if ($tokens[$next]['code'] === T_OPEN_PARENTHESIS) {
			return true;
		}

		// Ignore USE keywords for traits.
		if ($phpcsFile->hasCondition($stackPtr, array(T_CLASS, T_TRAIT)) === true) {
			return true;
		}

		return false;

	}//end _shouldIgnoreUse()

}
