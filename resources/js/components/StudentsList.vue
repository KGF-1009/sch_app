<template>
    <table id="studentTable" class="table table-hover m-t-3">
        <caption>
            <h2>ALL STUDENTS TABLE</h2>
        </caption>
        <thead class="thead-dark">
            <tr>
                <th>#</th>
                <th>Matricule</th>
                <th>First Name</th>
                <th>Second Name</th>
                <th>Level</th>
                <th>Sex</th>
                <th colspan="2">Modify</th>
            </tr>
        </thead>
        <tbody>
            <student-row
                v-for="(student, index) in students"
                :student="student"
                :index="++index"
                :key="student.student_id"
            ></student-row>
        </tbody>
    </table>
</template>

<script>
import StudentRow from "./StudentRow";
export default {
    components: {
        "student-row": StudentRow
    },
    data() {
        return {
            students: {},
            error: ""
        };
    },
    mounted() {
        axios
            .get("vue/students")
            .then(response => (this.students = response.data))
            .catch(function(e) {
                this.error = "error from StudentListVue";
                console.log("error.From StudentListVue");
            });
    },
    computed: {
        addCounter() {}
    }
};
</script>
