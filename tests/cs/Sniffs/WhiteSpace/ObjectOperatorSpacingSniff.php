<?php

class cs_Sniffs_WhiteSpace_ObjectOperatorSpacingSniff implements PHP_CodeSniffer_Sniff
{

	public function register()
	{
		return [T_OBJECT_OPERATOR];
	}

	/**
	 * @param PHP_CodeSniffer_File $phpcsFile
	 * @param int $stackPtr
	 *
	 * @return void
	 */
	public function process(PHP_CodeSniffer_File $phpcsFile, $stackPtr)
	{
		$tokens = $phpcsFile->getTokens();

		$prevToken = $phpcsFile->findPrevious(PHP_CodeSniffer_Tokens::$emptyTokens, $stackPtr - 1, NULL, TRUE);
		// Line breaks are allowed before an object operator.
		if ($tokens[$stackPtr]['line'] === $tokens[$prevToken]['line']
			&& $prevToken < ($stackPtr - 1)
		)
		{
			$error = 'Space found before object operator';
			$phpcsFile->addError($error, $stackPtr, 'Before');
		}

		$nextType = $tokens[($stackPtr + 1)]['code'];
		if (in_array($nextType, PHP_CodeSniffer_Tokens::$emptyTokens))
		{
			$error = 'Space found after object operator';
			$phpcsFile->addError($error, $stackPtr, 'After');
		}

	}

}
