<?php

class cs_Sniffs_Newlines_NamespaceNewlinesSniff implements PHP_CodeSniffer_Sniff
{

	public function register()
	{
		return [T_NAMESPACE];
	}

	/**
	 * @param PHP_CodeSniffer_File $phpcsFile
	 * @param int $stackPtr
	 * @return void
	 */
	public function process(PHP_CodeSniffer_File $phpcsFile, $stackPtr)
	{
		$tokens = $phpcsFile->getTokens();

		if ($tokens[$stackPtr]['line'] !== 3)
		{
			$phpcsFile->addError('Namespace declaration must have exactly one empty newline above', $stackPtr, 'NewlineAbove');
		}

		$nextUse = $phpcsFile->findNext(T_USE, ($stackPtr + 1), NULL, FALSE);
		if ($nextUse && !$this->_shouldIgnoreUse($phpcsFile, $nextUse))
		{
			if ($tokens[$nextUse]['line'] !== 5)
			{
				$phpcsFile->addError('Namespace declaration must have exactly one empty newline below with usings', $stackPtr, 'NewlineBelowWithUsings');
			}
		}
		else
		{
			$nexts = [];
			foreach ([T_CLASS, T_TRAIT, T_INTERFACE, T_DOC_COMMENT] as $type)
			{
				$nexts[] = $phpcsFile->findNext($type, ($stackPtr + 1), NULL, FALSE);
			}
			$nexts = array_filter($nexts);

			$next = min($nexts);
			if ($next && $tokens[$next]['line'] !== 6)
			{
				$phpcsFile->addError('Namespace declaration must have exactly two empty newlines below without usings', $stackPtr, 'NewlineBelowWithoutUsings');
			}
		}
	}

	/**
	 * Check if this use statement is part of the namespace block.
	 *
	 * @param PHP_CodeSniffer_File $phpcsFile
	 * @param int $stackPtr
	 * @return bool
	 */
	private function _shouldIgnoreUse(PHP_CodeSniffer_File $phpcsFile, $stackPtr)
	{
		$tokens = $phpcsFile->getTokens();

		// keyword inside closure
		$next = $phpcsFile->findNext(T_WHITESPACE, ($stackPtr + 1), NULL, TRUE);
		if ($tokens[$next]['code'] === T_OPEN_PARENTHESIS)
		{
			return TRUE;
		}

		// trait
		if ($phpcsFile->hasCondition($stackPtr, T_CLASS) === TRUE)
		{
			return TRUE;
		}

		return FALSE;
	}

}
