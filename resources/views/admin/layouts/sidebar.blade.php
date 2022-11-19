<!-- Sidebar -->
<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="menu-title"> 
                    <span>Main</span>
                </li>
                <li> 
                    <a href="index.html"><i class="fe fe-home"></i> <span>Dashboard</span></a>
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
                        <li><a href="invoice-report.html">Exam Type</a></li>
                        <li><a href="invoice-report.html">Subject</a></li>
                        <li><a href="invoice-report.html">Assign Subject</a></li>
                        <li><a href="invoice-report.html">Designation</a></li>
                    </ul>
                </li>

                <li class="submenu">
                    <a href="#"><i class="fe fe-document"></i> <span> Reports</span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="invoice-report.html">Invoice Reports</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- /Sidebar -->