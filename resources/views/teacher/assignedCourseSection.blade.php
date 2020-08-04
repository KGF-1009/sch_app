<span class="fas fa-book"></span> Courses ({{$courses_assigned->count()}})
        <!-- to line 339 -->
<ul>
    @forelse($courses_assigned as $course)
        <li>
            <a title="{{$course->cname}}" href="{{route('course.show', $course->course_id)}}">
                {{$course->course_id}} 
            </a> <i class ='removeCourse' onclick="unAssignCourse('{{$course->course_id}}')" course_id ='{{$course->course_id}}'><span style='color:red'  class='fas fa-trash' title='Click to remove'></span></i>	
        </li>
    @empty
        <li>None</li>
    @endforelse				    			
</ul>
