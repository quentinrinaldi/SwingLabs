function getLineAmount(nbOfShares, entryPrice, currencyRatio) {
	if (nbOfShares == '' || entryPrice == '' || currencyRatio =='' )
		return null;
	return (nbOfShares * entryPrice * currencyRatio).toFixed(2);
}

function getNbOfSharesMax(marketFeelingRatio, accountValue, currencyRatio, entryPrice, stopPrice) {
	if (marketFeelingRatio == '' || accountValue == '' || currencyRatio == '' || entryPrice == '' || stopPrice =='' )
		return null;
	return Math.round((marketFeelingRatio * accountValue * currencyRatio) / (entryPrice - stopPrice));
}

function getRiskPerTrade(nbOfShares, entryPrice, stopPrice, accountValue, currencyRatio) {
	if (nbOfShares == '' || entryPrice == '' || stopPrice == '' || accountValue == '' || currencyRatio =='' )
		return null;
	return (100 * (nbOfShares * (entryPrice - stopPrice)) / (accountValue * currencyRatio)).toFixed(2);
}

function getAssetRatio(nbOfShares, entryPrice, accountValue, currencyRatio) {
	if (nbOfShares == '' || entryPrice == '' || accountValue == '' || currencyRatio =='' )
		return null;
	return (100* (nbOfShares * entryPrice) / (accountValue * currencyRatio)).toFixed(2);
}

function getMaxEntry (entryPrice, stopPrice) {
	if (entryPrice == '' || stopPrice == '')
		return null;
	//alert(0.9 * (entryPrice - stopPrice));
	return (+entryPrice + (0.09 * (entryPrice - stopPrice)));
}