/*所有模块*/
const moduleList = global.process.moduleLoadList;

function globalModule(){
	let moduleInfo = {};
	moduleList.forEach(function(el) {
		let module = el.split(' ');
		
		let moduleType = module[0];
		let moduleDetail = module[0] == 'Internal' ? module[1]+'_'+module[2] : module[1];
		//检测是否已存在
		if (moduleInfo[moduleType]) {
			moduleInfo[moduleType].push(moduleDetail);
		}else{
			moduleInfo[moduleType] = [moduleDetail];
		}
		
	});
	return moduleInfo;
}

function getModule(){
	let moduleInfo = [
		"assert",
		"async_hooks",
		"Buffer",
		"child_process",
		"cluster",
		"console",
		"cypto",
		"debugger",
		"dgram",
		"dns",
		"domain",
		"Errpr",
		"events",
		"fs",
		"global",
		"http",
		"http2",
		"https",
		"inspector"
		"module",
		"net",
		"os"
		"path"
		"perf_hooks",
		"process"
		"punycode"
		"querystring"
		"readline",
		"repl",
		"stream"
	];
}

function log(e){
	console.log(e);
}