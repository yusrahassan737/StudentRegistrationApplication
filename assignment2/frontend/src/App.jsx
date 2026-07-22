import { useState } from 'react'

import './style.css'
import Header from './Header.jsx'
import Footer from './Footer.jsx'
import StudentForm from './StudentForm.jsx'
import StudentList from './StudentList.jsx'

function App() {
  const [currentPage, setCurrentPage] = useState('register');

  return (
    <div>
      <nav>
        <button onClick = {() => setCurrentPage("register")}>Register</button>
        <button onClick = {() => setCurrentPage("display")}>Student Directory</button>
      </nav>
      <main>
        <Header />
        <h1>Hello World</h1>
        {currentPage === 'register' && <StudentForm />}
        {currentPage === 'display' && <StudentList />}
        <Footer />
      </main>
    </div>
  );
}
export default App