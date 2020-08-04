<template>
    <tr>
        <td>{{ index }}</td>
        <td>
            <a :href="'/students/' + student.student_id">{{
                student.student_id
            }}</a>
        </td>
        <td>{{ student.fname }}</td>
        <td>{{ student.sname }}</td>
        <td>{{ student.level }}</td>
        <td>{{ student.sex == "male" ? "M" : "F" }}</td>

        <td>
            <a :href="'/students/' + student.student_id + '/edit'"
                ><button class="btn btn-sm btn-outline-primary">
                    <span class="fas fa-edit"></span>Edit
                </button></a
            >
        </td>
        <td>
            <button
                @click="deleteStudent(student.student_id)"
                class="btn btn-sm btn-outline-danger"
            >
                <span class="fas fa-trash"></span>Delete
            </button>
        </td>
        <bs-modal></bs-modal>
    </tr>
</template>
<script>
export default {
    data() {
        return {};
    },
    props: {
        student: {
            type: Object,
            required: true
        },
        index: {
            type: Number,
            required: true
        }
    },
    methods: {
        deleteStudent(id) {
            //id of student to be deleted
            alert("do you want to delete " + id + " ?");
            console.log(id + " deleting.......");
        }
    }
};
</script>
