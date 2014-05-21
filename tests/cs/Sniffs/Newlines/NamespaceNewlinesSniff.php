<?php

/**
 * @category PHP
 * @package Clevis\Sim
 */
class cs_Sniffs_Newlines_NamespaceNewlinesSniff implements PHP_CodeSniffer_Sniff
{

	/**
	 * Returns the token types that this sniff is interested in.
	 *
	 * @return array(int)
	 */
	public function register()
	{
		return array(T_NAMESPACE);
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

		if ($tokens[$stackPtr]['line'] !== 3)
		{
			$phpcsFile->addError('Namespace declaration must have exactly one empty newline above', $stackPtr, 'NewlineAbove');
		}

		$nextUse = $phpcsFile->findNext(T_USE, ($stackPtr + 1), null, false);
		if ($nextUse && !$this->_shouldIgnoreUse($phpcsFile, $nextUse))
		{
			if ($tokens[$nextUse]['line'] !== 5)
			{
				$phpcsFile->addError('Namespace declaration must have exactly one empty newline below with usings', $stackPtr, 'NewlineBelowWithUsings');
			}
		}
		else
		{
			$nextClass = $phpcsFile->findNext(T_CLASS, ($stackPtr + 1), null, false);
			$nextTrait = $phpcsFile->findNext(T_TRAIT, ($stackPtr + 1), null, false);
			$nextDoc = $phpcsFile->findNext(T_DOC_COMMENT, ($stackPtr + 1), null, false);
			$next = min($nextDoc ?: 1e9, $nextClass ?: 1e9, $nextTrait ?: 1e9);

			if ($next && $tokens[$next]['line'] !== 6)
			{
				$phpcsFile->addError('Namespace declaration must have exactly two empty newlines below without usings', $stackPtr, 'NewlineBelowWithoutUsings');
			}
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
