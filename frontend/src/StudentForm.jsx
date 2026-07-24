export default function StudentForm() {
  return <div>
            <h2>Student Registration</h2>

            <form action="../backend/register.php" method="post">

                <p>First Name</p>
                <input
                    type="text"
                    name="firstname"
                    required
                />

                <br/><br/>

                <p>Last Name</p>
                <input
                    type="text"
                    name="lastname"
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