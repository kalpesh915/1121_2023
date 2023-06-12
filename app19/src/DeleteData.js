function DeleteData(){

    const APIURL = "http://localhost:3000/students";
    function deleteProcess(){
        let id = prompt("Enter ID to Delete Data");

        fetch(APIURL+"/"+id, {
            method: 'DELETE'
        }).then((result)=>{
            alert("Data Deleted");
        })
    }
    return <>
        <h1>Delete Data From API</h1>
        <button onClick={()=>deleteProcess()}>Delete</button>
    </>
}

export default DeleteData;