import logo from './logo.svg';
import './App.css';
import { useState } from 'react';
import { useEffect } from 'react';

function App() {

  // create required state for form handling
  let [id, setId] = useState(0);
  let [fname, setFname] = useState("");
  let [lname, setLname] = useState("");
  let [city, setCity] = useState("");
  let [phone, setPhone] = useState("");
  let [email, setEmail] = useState("");
  let [status, setStatus] = useState(true);
  let [students, setStudents] = useState([]);

  // URL for API
  const APIURL = "http://localhost:3000/students";


  // function for process on API
  // function for add new Data 

  function addNewData(event){
    //alert("Form Submited");
    event.preventDefault();

    if(status){

      // ADD new Data
      fetch(APIURL, {
        method:"POST",
        headers:{
          "Content-Type" : "Application/json",
          "Accept" : "Application/json"
        },body : JSON.stringify({fname, lname, city, phone, email})
      }).then((result)=>{
        result.json().then((response)=>{
          alert("New Data Inserted With "+response.id+" ID");
          getAllData();
        });
      });
    }else{
      fetch(APIURL+"/"+id, {
        method:"PUT",
        headers:{
          "Content-Type" : "Application/json",
          "Accept" : "Application/json"
        },body : JSON.stringify({fname, lname, city, phone, email})
      }).then((result)=>{
        result.json().then((response)=>{
          alert("Data Updated With "+response.id+" ID");
          getAllData();
          setStatus(true);
          resetForm();
        });
      });
    }
    
    resetForm();
  }

  function resetForm(){
    setFname("");
    setLname("");
    setCity("");
    setPhone("");
    setEmail("");
  }

  // function for get all the data 
  function getAllData(){
    fetch(APIURL).then((result)=>{
      result.json().then((response)=>{
        setStudents(response);
        //console.log(response);
      })
    });
    resetForm();
  }


  // use Effect for load data first time
  useEffect(()=>{
    getAllData();
  }, []);

  // delete Data
  function deleteData(uid){
    //alert("ID is "+uid);
    if(window.confirm("Are you sure to delete data with ID "+uid)){
      fetch(APIURL+"/"+uid,{
        method:'DELETE'
      }).then((result)=>{
        result.json().then((response)=>{
          
        });
      });
      alert("Data Deleted With ID "+uid);
    }
    getAllData();
  }

  function updateData(uid){
    //alert("Selected ID is "+uid);
    setId(uid);

    fetch(APIURL+"/"+uid).then((result)=>{
      result.json().then((response)=>{
        //console.log(response);
        setFname(response.fname);
        setLname(response.lname);
        setCity(response.city);
        setPhone(response.phone);
        setEmail(response.email);
        setStatus(false);
      });
    });
  }

  return (
    <div className="App">
      <div className='container-fluid'>
        <h1 className='bg-primary text-white p-4'>API CRUD Operation</h1>

        <div className='row'>
          <div className='col-md-3'>
            <form onSubmit={addNewData}>
              <div className='form-floating my-1'>
                <input type='text' id='fname' name='fname' placeholder='Enter First Name' className='form-control' onChange={(e)=>setFname(e.target.value)} defaultValue={fname} required></input>
                <label htmlFor='fname' className='form-label'>Enter First Name</label>
              </div>
              <div className='form-floating my-1'>
                <input type='text' id='lname' name='lname' placeholder='Enter Last Name' className='form-control' onChange={(e)=>setLname(e.target.value)}  defaultValue={lname} required></input>
                <label htmlFor='lname' className='form-label'>Enter Last Name</label>
              </div>
              <div className='form-floating my-1'>
                <input type='text' id='city' name='city' placeholder='Enter City' className='form-control' onChange={(e)=>setCity(e.target.value)}  defaultValue={city} required></input>
                <label htmlFor='city' className='form-label'>Enter City</label>
              </div>
              <div className='form-floating my-1'>
                <input type='text' id='phone' name='phonr' placeholder='Enter Phone Number' className='form-control' onChange={(e)=>setPhone(e.target.value)}  defaultValue={phone} required></input>
                <label htmlFor='phone' className='form-label'>Enter Phone Number</label>
              </div>
              <div className='form-floating my-1'>
                <input type='email' id='email' name='email' placeholder='Enter Email Address' className='form-control' onChange={(e)=>setEmail(e.target.value)}  defaultValue={email} required></input>
                <label htmlFor='email' className='form-label'>Enter Email Address</label>
              </div>
              <div className='my-1'>
                {
                  status ? 
                  <input type='submit' value="Add New Data" className='btn btn-primary' ></input>
                  :
                  <input type='submit' value="Save Data" className='btn btn-primary' ></input>
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
                  <th>Phone</th>
                  <th>Email</th>
                  <th>Action</th>
                </tr>
              </thead>

              <tbody>
                {
                  students.map((row)=>
                    <tr>
                      <td>{row.id}</td>
                      <td>{row.fname}</td>
                      <td>{row.lname}</td>
                      <td>{row.city}</td>
                      <td>{row.phone}</td>
                      <td>{row.email}</td>
                      <td>
                        <button type='button' onClick={()=>updateData(row.id)} className='btn btn-primary mx-2'>Edit</button>
                        <button type='button' onClick={()=>deleteData(row.id)} className='btn btn-danger'>Delete</button>
                      </td>
                    </tr>
                  )
                }
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  );
}

export default App;
