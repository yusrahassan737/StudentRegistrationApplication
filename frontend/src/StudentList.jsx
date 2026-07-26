import { useState, useEffect } from "react";

const BACKEND_URL = "http://localhost/StudentRegistrationApplication/backend/students.php";

export default function StudentList() {
    const [students, setStudents] = useState([]);
    const [loading, setLoading] = useState(true);
    const [error, setError] = useState(false);

    useEffect(() => {
        const loadStudents = async () => {
            try {
                const response = await fetch(BACKEND_URL);
                const data = await response.json();
                setStudents(Array.isArray(data) ? data : []);
                setError(false);
            } catch (err) {
                console.error("Error loading students:", err);
                setError(true);
            } finally {
                setLoading(false);
            }
        };

        loadStudents();
    }, []);

    if (loading) {
        return (
            <div className="directory">
                <h1>Student Directory</h1>
                <p className="note">Loading students...</p>
            </div>
        );
    }

    if (error) {
        return (
            <div className="directory">
                <h1>Student Directory</h1>
                <div className="error">
                    <h1>Could not reach the server. Start Apache and MySQL in XAMPP, then reload.</h1>
                </div>
            </div>
        );
    }

    if (students.length === 0) {
        return (
            <div className="directory">
                <h1>Student Directory</h1>
                <p className="note">No students yet. Register one on the Register page.</p>
            </div>
        );
    }

    return (
        <div className="directory">
            <h1>Student Directory</h1>
            <table className="student-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Program</th>
                    </tr>
                </thead>
                <tbody>
                    {students.map((student) => (
                        <tr className="student-row" key={student.studentID}>
                            <td>{student.studentID}</td>
                            <td>{student.firstName}</td>
                            <td>{student.lastName}</td>
                            <td>{student.program}</td>
                        </tr>
                    ))}
                </tbody>
            </table>
            <p className="note">Total: {students.length} students</p>
        </div>
    );
}