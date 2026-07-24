export default function StudentForm() {
  return <div>
            <h2>Student Registration</h2>

            <form action="http://localhost/Assignment%202/backend/register.php" method="post">

                <p>First Name</p>
                <input
                    type="text"
                    name="firstName"
                    required
                />

                <br/><br/>

                <p>Last Name</p>
                <input
                    type="text"
                    name="lastName"
                    required
                />

                <br/><br/>

                <p>Email</p>

                <input
                    type="email"
                    name="email"
                    required
                />

                <br/><br/>

                <p>Program</p>

                <input
                    type="text"
                    name="program"
                    required
                />

                <br/><br/>

                <input
                    type="submit"
                    value="Register Student"
                />

            </form>

        </div>
}