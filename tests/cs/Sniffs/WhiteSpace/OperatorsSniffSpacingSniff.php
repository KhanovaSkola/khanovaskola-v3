<?php

class cs_Sniffs_WhiteSpace_OperatorsSniffSpacingSniff implements PHP_CodeSniffer_Sniff
{

	public function register()
	{
		$tokensToRegister = [T_BOOLEAN_NOT];
		foreach ([
			PHP_CodeSniffer_Tokens::$equalityTokens,
			PHP_CodeSniffer_Tokens::$comparisonTokens,
			PHP_CodeSniffer_Tokens::$arithmeticTokens,
			PHP_CodeSniffer_Tokens::$operators,
			PHP_CodeSniffer_Tokens::$assignmentTokens,
		] as $array)
		{
			foreach ($array as $token)
			{
				if (! in_array($token, $tokensToRegister))
				{
					$tokensToRegister[] = $token;
				}
			}
		}

		return $tokensToRegister;
	}

	/**
	 * @param PHP_CodeSniffer_File $phpcsFile
	 * @param int $stackPtr
	 * @return void
	 */
	public function process(PHP_CodeSniffer_File $phpcsFile, $stackPtr)
	{
		$tokens = $phpcsFile->getTokens();

		// if the token is a '&', it might be used in a control structure, (e.g. foreach ($arr as &$row) )
		// in which case it isn't an operator and doesn't require spaces around it.
		if ($tokens[$stackPtr]['code'] === T_BITWISE_AND
			|| $tokens[$stackPtr]['code'] === T_BOOLEAN_NOT)
		{
			return;
		}

		// assignment operator can have trailing & -> =& (even though it is discouraged to use)
		if ($tokens[$stackPtr]['code'] === T_EQUAL && $tokens[$stackPtr + 1]['code'] === T_BITWISE_AND)
		{
			return;
		}

		// 12/15 looks better without spacing
		if ($tokens[$stackPtr]['code'] === T_DIVIDE
			&& $tokens[$stackPtr - 1]['code'] === T_LNUMBER
		)
		{
			return;
		}

		// all operators MUST have a space before and after them.
		// only the ! operator requires only a trailing space (because a space is not allowed after opening parenthesis
		$data = [$tokens[$stackPtr]['content']];
		if ($tokens[$stackPtr]['code'] !== T_BOOLEAN_NOT
			&& (
				$tokens[$stackPtr - 1]['code'] !== T_WHITESPACE
				|| $tokens[$stackPtr - 1]['content'] !== ' '
			)
		)
		{
			$error = 'The %s operator requires exactly one leading space.';
			$phpcsFile->addError($error, $stackPtr, 'LeadingSpace', $data);
		}

		// minus operator can indicate a negative number
		if ($tokens[$stackPtr]['code'] !== T_MINUS
			&& (
				$tokens[$stackPtr + 1]['code'] !== T_WHITESPACE
				|| $tokens[$stackPtr + 1]['content'] !== ' '
			)
		)
		{
			$error = 'The %s operator requires exactly one trailing space.';
			$phpcsFile->addError($error, $stackPtr, 'TrailingSpace', $data);
		}
	}

}
