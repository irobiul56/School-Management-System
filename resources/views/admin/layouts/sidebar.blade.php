<!-- Sidebar -->
<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="menu-title"> 
                    <span>Main</span>
                </li>
                <li> 
                    <a href="{{route('admin.dashboard')}}"><i class="fe fe-home"></i> <span>Dashboard</span></a>
                </li>
                
                <li class="submenu">
                    <a href="#"><i class="fe fe-document"></i> <span> Admission</span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="{{route('admission.index')}}">All Student</a></li>
                        <li><a href="#">Admit Card</a></li>
                        <li><a href="#">Sit Plan</a></li>
                        <li><a href="#">Admission Result</a></li>
                    </ul>
                </li>

                <li class="submenu">
                    <a href="#"><i class="fe fe-document"></i> <span> Setup Management</span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="{{route('student-class.index')}}">Student Class</a></li>
                        <li><a href="{{route('student-year.index')}}">Student Year</a></li>
                        <li><a href="{{route('student-group.index')}}">Student Group</a></li>
                        <li><a href="{{route('student-shift.index')}}">Student Shift</a></li>
                        <li><a href="{{route('student-fee-category.index')}}">Fee Category</a></li>
                        <li><a href="{{route('student-fee-amount.index')}}">Fee Amount</a></li>
                        <li><a href="{{route('student-exam-type.index')}}">Exam Type</a></li>
                        <li><a href="{{route('student-subject.index')}}">Subject</a></li>
                        <li><a href="{{route('assign-subject.index')}}">Assign Subject</a></li>
                        <li><a href="{{route('designation.index')}}">Designation</a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="#"><i class="fe fe-document"></i> <span> Student Management</span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="#">Registration</a></li>
                        <li><a href="#">Student Promotion</a></li>
                        <li><a href="#">Roll Generate</a></li>
                        <li><a href="{{route('registration-fee-show')}}">Registration Fee</a></li>
                        <li><a href="#">Student Monthly Fee</a></li>
                        <li><a href="#">Student Exam Fee</a></li>
                    </ul>
                </li>

                <li class="submenu">
                    <a href="#"><i class="fe fe-document"></i> <span> Marks Management</span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="{{route('marks-management.index')}}">Marks Entry</a></li>
                        <li><a href="{{route('get.student.marks')}}">Edit Marks</a></li>
                        <li><a href="{{route('grade-point.index')}}">Grade Point</a></li>
                        <li><a href="{{route('tutorial-exam.index')}}">Tutorial Mark</a></li>
                        <li><a href="#">Monthly Exam</a></li>
                    </ul>
                </li>

                <li class="submenu">
                    <a href="#"><i class="fe fe-document"></i> <span> Reports</span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="invoice-report.html">Invoice Reports</a></li>
                    </ul>
                </li>

                <li class="submenu">
                    <a href="#"><i class="fe fe-document"></i> <span> Employee</span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="{{route('employee.index')}}">Employee List</a></li>
                    </ul>
                </li>

                <li class="submenu">
                    <a href="#"><i class="fe fe-document"></i> <span> Admin User</span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="{{route('user.index')}}">User</a></li>
                        <li><a href="{{route('role.index')}}">Role</a></li>
                        <li><a href="{{route('permission.index')}}">Permission</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- /Sidebar -->