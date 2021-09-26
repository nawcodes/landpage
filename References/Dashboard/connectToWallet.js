Web3Modal = window.Web3Modal.default;
const WalletConnectProvider = window.WalletConnectProvider.default;
const evmChains = window.evmChains;
let web3Modal;
let provider;
let selectedAccount;
let connected = true;
let contract;
let input = document.getElementById("lotteryAmount");
let code;
let contractAddress;
let mainnet = "https://data-seed-prebsc-1-s1.binance.org:8545/"
let minABI = [
  // balanceOf
  {
    "constant":true,
    "inputs":[{"name":"_owner","type":"address"}],
    "name":"balanceOf",
    "outputs":[{"name":"balance","type":"uint256"}],
    "type":"function"
  },
  // decimals
  {
    "constant":true,
    "inputs":[],
    "name":"decimals",
    "outputs":[{"name":"","type":"uint8"}],
    "type":"function"
  }
];

function validate(evt) {
    var theEvent = evt || window.event;

    // Handle paste
    if (theEvent.type === 'paste') {
        key = event.clipboardData.getData('text/plain');
    } else {
        // Handle key press
        var key = theEvent.keyCode || theEvent.which;
        key = String.fromCharCode(key);
    }
    var regex = /[0-9]|\./;
    if (!regex.test(key)) {
        theEvent.returnValue = false;
        if (theEvent.preventDefault) theEvent.preventDefault();
    }
}

async function init() {
    const providerOptions = {
        walletconnect: {
            package: WalletConnectProvider,
            options: {
                rpc: {
                    56: "wss://floral-rough-snow.bsc.quiknode.pro/",
                },
                chainId: 56,
                rpcUrl: "wss://floral-rough-snow.bsc.quiknode.pro/",
            },
        },
    };

    web3Modal = new Web3Modal({
        cacheProvider: false,
        providerOptions,
        disableInjectedProvider: false,
    });
    await checkingConnections();
    await getContract();
}

async function onConnect() {
    await init();

    if (connected) {
        try {
            provider = await web3Modal.connect();
            web3 = new Web3(provider);
            selectedAccount = web3.eth.accounts[0];

        } catch (e) {
            console.log("Could not get a wallet connection", e);
            return;
        }
    }
    //getData();
}

async function checkingConnections() {
    web3 = new Web3(window.ethereum);
    window.ethereum.on("accountsChanged", (accounts) => {
        window.location.reload();
    });

    window.ethereum.on("chainChanged", (chainId) => {
        window.location.reload();
    });

    window.ethereum.on("networkChanged", (networkId) => {
        window.location.reload();
    });

    selectedAccount = await web3.eth.getAccounts();

    if (selectedAccount.length > 0) {
        ethereum.enable();
        connected = false;
        selectedAccount = selectedAccount[0];
    }
}

async function getContract() {
    if (window.ethereum) {
        contractAddress = "0xAfa68DF6300f6e8D8A623cBf33853b58f9eF79e1";
        try {
            contract = new web3.eth.Contract(abi, contractAddress);
            //accounts = await ethereum.enable();
        } catch (e) {
            console.log(e);
        }
    }
}

async function enterLottery() {
    if (!document.getElementById("lotteryAmount").value || parseInt(document.getElementById("lotteryAmount").value) > 100 || parseInt(document.getElementById("lotteryAmount").value) < 1) {
        alert("please enter a value between 1 and 100");
        return;
    }

    let amount = ((document.getElementById("lotteryAmount").value) * 0.01).toLocaleString('en-US', {
        maximumFractionDigits: 2
    });;
    amount = web3.utils.toWei(amount, "ether");

    console.log(amount)

    await contract.methods.enter().send({
        from: selectedAccount,
        value: amount
    });
    window.location.reload();
}


function validate(evt) {
  var theEvent = evt || window.event;

  
  if (theEvent.type === 'paste') {
      key = event.clipboardData.getData('text/plain');
  } else {
      var key = theEvent.keyCode || theEvent.which;
      key = String.fromCharCode(key);
  }
  
  var regex = /[0-9]|x|\./;
  if( !regex.test(key) ) {
    theEvent.returnValue = false;
    if(theEvent.preventDefault) theEvent.preventDefault();
  }
}

checkingConnections();
//onConnect();



document.getElementById("lotteryAmount").addEventListener('input', function (evt) {
	regex = /^0x[a-fA-F0-9]{40}$/;
	if(regex.test(this.value)){
		console.log("success");
		getData(this.value);
	}
});


async function getData(address) {
   await getContract();
    console.log(address)
	let addressDividendsMap = await contract.methods.getAccountDividendsInfo(address).call();
	let addressDividends = addressDividendsMap["4"];
	

	let totalDividends = await contract.methods.getTotalDividendsDistributed().call();
	
	let res1 = document.getElementById("res1")
	for(let i = 0; i<18; i++){
		addressDividends = addressDividends/10
	}
	res1.innerHTML = "<span class=\"value\">"+(Math.round(addressDividends*10000)/10000) + " ADA </span> in dividends paid to this address";
	
	let res2 = document.getElementById("res2")
	for(let i = 0; i<18; i++){
		totalDividends = totalDividends/10
	}
	res2.innerHTML = "<span class=\"value\">"+(Math.round(totalDividends*100)/100) + " ADA </span> in dividends paid in total";
	
	let test = document.getElementsByClassName("value");
	
	for(let i=0; i<test.length; i++){
		test[i].style.color = '#f8ec06';
		test[i].style.fontSize = "20px";
		test[i].style.fontWeight = "bold";
		test[i].style.paddingRight = "3px";
	}

	let tokens = document.getElementById("AKHoldings")
	
	let BNB = document.getElementById("totalBNBWallet")
	
	let percentage = document.getElementById("percentage")

	let contract2 = new web3.eth.Contract(minABI,contractAddress);
	async function getKittyBalance() {
	  balance = await contract2.methods.balanceOf(address).call();
	  return balance;
	}
	
	let kittyCounter = await getKittyBalance();

	var BNBCounter = await web3.eth.getBalance(address); //Will give value in.
	console.log(BNBCounter);
	
	for(let i = 0; i<18; i++){
		kittyCounter = kittyCounter/10
		BNBCounter = BNBCounter/10
	}

	tokens.innerHTML = Math.round(kittyCounter)+" FLOKIADA";
	BNB.innerHTML = Math.round(BNBCounter*10000)/10000+" BNB";
	percentage.innerHTML = Math.round((kittyCounter/1000000000)*1000)/1000 + " %";
}
