import { useEffect, useState } from 'react';
import './App.css';

function App() {
  const APIURL = "http://localhost:3000/students";

  // required states for project
  let [id, setId] = useState(0);
  let [fname, setFname] = useState("");
  let [lname, setLname] = useState("");
  let [city, setCity] = useState("");
  let [email, setEmail] = useState("");
  let [phone, setPhone] = useState("");
  let [status, setStatus] = useState(true);
  let [students, setStudents] = useState([]);

  function processData(event) {
    //alert("Called");
    event.preventDefault();
    //console.log(JSON.stringify({fname, lname, city, phone, email}));
    // add new data
    if (status) {
      fetch(APIURL, {
        method: "POST",
        headers: {
          "Content-Type": "Application/json",
          "Accept": "Application/json"
        },
        body: JSON.stringify({ fname, lname, city, phone, email })
      }).then((result) => {
        result.json().then((response) => {
         alert("New Data Inserted with " + response.id + " ID ");
         getData();
        resetForm();
        });
      });
    } else {
      // edit data code
      fetch(APIURL+"/"+id,{
        method : "PUT",
        headers : {
          'Content-Type' : "Application/json",
          "Accept" : "Application/json"
        },
        body : JSON.stringify({fname, lname, city, phone, email})
      }).then((result)=>{
        result.json().then((response)=>{
          alert("Data Updated With ID "+response.id);
          getData();
          resetForm();
        });
      })
    }
  }

  function getData() {
    fetch(APIURL).then((result) => {
      result.json().then((response) => {
        setStudents(response);
      });
    });
  }

  useEffect(() => {
    getData();
  }, []);

  function deleteData(userid) {
    //alert(userid);

    if (window.confirm("Are you sure to delete Data ?")) {
      fetch(APIURL + "/" + userid, {
        method: "DELETE"
      }).then((result) => {
        result.json().then((response) => {
          getData();
          alert("Data Deleted With ID " + userid);
        });
      });
    } 
  }

  function resetForm(){
    setFname("");
    setLname("");
    setCity("");
    setEmail("");
    setPhone("");
    setId("");
    setStatus(true);
  }

  function editData(userid){
    //alert(userid);
    fetch(APIURL+"/"+userid).then((result)=>{
      result.json().then((response)=>{
        setId(userid);
        setFname(response.fname);
        setLname(response.lname);
        setCity(response.city);
        setPhone(response.phone);
        setEmail(response.email);
        setStatus(false);
      });
    })
  }

  return (
    <div className="container-fluid">
      <h1 className='text-center text-white bg-primary p-4'>API with JSON Server</h1>

      <div className='row'>
        <div className='col-md-3'>
          <form onSubmit={processData}>
            <div className='form-floating my-2'>
              <input type='text' className='form-control' id='fname' name='fname' placeholder='Enter First Name' required onChange={(e) => setFname(e.target.value)} defaultValue={fname}></input>
              <label className='form-lable' htmlFor='fname'>Enter First Name</label>
            </div>
            <div className='form-floating my-2'>
              <input type='text' className='form-control' id='lname' name='lname' placeholder='Enter Last Name' required onChange={(e) => setLname(e.target.value)} defaultValue={lname}></input>
              <label className='form-lable' htmlFor='lname'>Enter Last Name</label>
            </div>
            <div className='form-floating my-2'>
              <input type='text' className='form-control' id='city' name='city' placeholder='Enter City Name' required onChange={(e) => setCity(e.target.value)} defaultValue={city}></input>
              <label className='form-lable' htmlFor='city'>Enter City Name</label>
            </div>
            <div className='form-floating my-2'>
              <input type='text' className='form-control' id='phone' name='phone' placeholder='Enter Phone Number' required onChange={(e) => setPhone(e.target.value)} defaultValue={phone}></input>
              <label className='form-lable' htmlFor='phone'>Enter Phone Number</label>
            </div>
            <div className='form-floating my-2'>
              <input type='email' className='form-control' id='email' name='email' placeholder='Enter E Mail Address' onChange={(e) => setEmail(e.target.value)} required defaultValue={email}></input>
              <label className='form-lable' htmlFor='email'>Enter E Mail Address</label>
            </div>
            <div className='form-floating my-2'>
              {
                status ?
                  <>
                    <input type='submit' value="Add New Data" className='btn btn-primary'></input>
                    <input type='reset' value="Reset" className='btn btn-danger'></input>
                  </>
                  :
                  <>
                    <input type='submit' value="Save Data" className='btn btn-primary'></input>
                    <input type='button' onClick={() => resetForm()} value="Cancel" className='btn btn-danger'></input>
                  </>
              }

            </div>
          </form>
        </div>

        <div className='col-md-9 table-responsive'>
          <table className='table table-hover'>
            <thead className='table-dark'>
              <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>City</th>
                <th>E Mail</th>
                <th>Phone</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              {
                students.map((row) =>
                  <tr>
                    <td>{row.id}</td>
                    <td>{row.fname}</td>
                    <td>{row.lname}</td>
                    <td>{row.city}</td>
                    <td>{row.email}</td>
                    <td>{row.phone}</td>
                    <td>
                      <button className='btn btn-success' onClick={()=> editData(row.id)}>Edit</button>
                      <button className='btn btn-danger' onClick={() => deleteData(row.id)}>Delete</button>
                    </td>
                  </tr>
                )
              }
            </tbody>
          </table>
        </div>
      </div>
    </div>
  );
}

export default App;
