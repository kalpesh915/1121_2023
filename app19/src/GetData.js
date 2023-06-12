import { useState } from "react";

function GetData(){
    const APIURL = "http://localhost:3000/students";
    const [students, setStudents] = useState([]);

    function getData(){
        //alert("get data called");
        fetch(APIURL).then((result)=>{
            result.json().then((response)=>{
                setStudents(response);
                console.log(response);
                alert("Data Loaded");
            });
        });
    }

    return <>
        <h1>Get Data from API</h1>
        <button onClick={()=> getData()}>Get Data </button>
    </>
}

export default GetData;