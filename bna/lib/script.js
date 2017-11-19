/**
* A transaction processor function description
* @param {org.acme.iledger.close_case} icase Case ID
* @transaction
*/
function transactionProcessorCloseCase(icase) {
  var real_case = icase.real_case;
  if(real_case.payed) {
   return false; 
  }
  real_case.payed = real_case.summ;
  var contract = real_case.contract;
  contract.max_summ -= real_case.summ;
  return getAssetRegistry('org.acme.iledger.Case')
    .then(function (assetRegistry) {
      return assetRegistry.update(real_case);
    })
  	.then(function() {
            return getAssetRegistry('org.acme.iledger.Contract')
        })
        .then(function(contractRegistry) {
            return contractRegistry.update(contract);
        });
}