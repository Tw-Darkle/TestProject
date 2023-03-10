<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            สวัสดี {{Auth::user()->name}}
            
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-md-8"> 
                    @if(session("success"))
                            <div class="alert alert-success">{{session('success')}}</div>
                    @endif
                    <div class="card">
                        <div class="card-header">ตารางข้อมูลแผนก</div>
                    </div> 
                </div>
                 <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">แบบฟอร์ม</div>
                            <div class="card-body">
                                <form action="{{Route('addDepartment')}}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <label for="department">ชื่อแผนก</label>
                                        <input type="text" class="form-control" name="department_name"> 
                                    </div>
                                    @error('department_name')
                                       <div class="my-2">
                                       <span class="text-danger my-2">{{$message}}</span>
                                       </div>
                                    @enderror
                                    <br>
                                    <input type="submit" class="btn btn-primary" value="บันทึก"></input>
                                </form>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
