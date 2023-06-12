function AddData(){
    let APIURL = "http://localhost:3000/students";
    function addProcess(){
        //alert("Add Data Called");
        let fname = prompt("Enter First Name");
        let lname = prompt("Enter Last Name");
        let city = prompt("Enter City");
        fetch(APIURL, {
            method : 'POST',
            headers : {
                'Accept' : 'Application/json',
                'Content-Type' : 'Application/json'
            },
            body : JSON.stringify({fname, lname, city})
        }).then((result)=>{
            alert("New Record Inserted");
        });
    }
    return <>
        <h1>Add New Data to API</h1>
        <button onClick={()=>addProcess()}>Add Now</button>
        <hr />
    </>
}
export default AddData;