@extends('layouts.master')
@section('title') User Management @endsection
@section('contents')
                <div class="md:flex block items-center justify-between mb-6 mt-[2rem]  page-header-breadcrumb">
                  <div class="my-auto">
                    <h5 class="page-title text-[1.3125rem] font-medium text-defaulttextcolor mb-0">Users</h5>
                    <nav>
                      <ol class="flex items-center whitespace-nowrap min-w-0">
                        <li class="text-[12px]"> <a class="flex items-center text-primary hover:text-primary"
                            href="javascript:void(0);"> Dashboard <i
                              class="ti ti-chevrons-right flex-shrink-0 mx-3 overflow-visible text-textmuted rtl:rotate-180"></i>
                          </a> </li>
                        <li class="text-[12px]"> <a class="flex items-center text-textmuted"
                            href="javascript:void(0);">Users 
                          </a> </li>
                      </ol>
                    </nav>
                  </div>
                </div>

  <div class="xl:col-span-6 col-span-12">
                        <div class="box custom-box">
                            <div class="box-header flex justify-between">
                                <div class="box-title">
                                    All Users
                                </div>
                                <div class="prism-toggle">
                                    <button type="button"
                                        class="ti-btn !py-1 !px-2 ti-btn-primary !font-medium !text-[0.75rem]">New User <i class="ri-add-circle-line"></i></button>
                                </div>
                            </div>
                            <div class="box-body">
                                <div class="table-responsive">
                                    <table class="table whitespace-nowrap table-bordered min-w-full">
                                        <thead>
                                            <tr class="border-b border-defaultborder">
                                                <th scope="col" class="text-start">User</th>
                                                <th scope="col" class="text-start">Email</th>
                                                <th scope="col" class="text-start">Status</th>
                                                <th scope="col" class="text-start">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                              @foreach ($user as $users)
                                                  <tr class="border-b border-defaultborder">
                                                <th scope="row">
                                                    <div class="flex items-center">
                                                        <span class="avatar avatar-xs me-2 online avatar-rounded">
                                                            <img src="{{ asset('backend/assets/images/faces/13.jpg') }}" alt="img">
                                                        </span>S{{ $users->name }}
                                                    </div>
                                                </th>
                                                <td>{{ $users->email }}</td>
                                                <td><span class="badge bg-success/10 text-success">Active</span></td>
                                                <td>
                                                    <div class="hstack gap-2 flex-wrap">
                                                        <a aria-label="anchor" href="javascript:void(0);"
                                                            class="text-info text-[.875rem] leading-none"><i
                                                                class="ri-edit-line"></i></a>
                                                        <a aria-label="anchor" href="javascript:void(0);"
                                                            class="text-danger text-[.875rem] leading-none"><i
                                                                class="ri-delete-bin-5-line"></i></a>
                                                    </div>
                                                </td>
                                            </tr>
                                               @endforeach
                                           
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="box-footer hidden border-t-0">
                            </div>
                        </div>
                    </div>

@endsection