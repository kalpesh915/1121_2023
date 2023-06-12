function UpdateData(){

    const APIURL = "http://localhost:3000/students";
    function updateProcess(){
        let id = prompt("Enter ID to Delete Data");
        let fname = prompt("Enter New First Name");
        let lname = prompt("Enter New Last Name");
        let city = prompt("Enter New City");

        fetch(APIURL+"/"+id, {
            method: 'PUT',
            headers : {
                'Accept':'Application/json',
                'Content-type':'Application/json'
            },
            body: JSON.stringify({fname, lname, city})
        }).then((result)=>{
            alert("Data Uodated");
        });
    }

    return <>
    <hr/>
        <h1>Update Data</h1>
        <button onClick={()=>{updateProcess()}}>Update Data</button>
    </>
}

export default UpdateData;