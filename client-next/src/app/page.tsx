"use client";
import {
  FetchUsersRequest,
  PaginatedUser,
  StoreUserRequest,
  UpdateUserRequest,
  User,
  UsersApi,
} from "@/api";
import { useEffect, useState } from "react";

type TUserPayload = StoreUserRequest & UpdateUserRequest & { id?: number };
const defaultStoreUserRequest: StoreUserRequest = {
  name: "",
  email: "",
  password: "",
};

const UserService = new UsersApi();

export default function Home() {
  const [users, setUsers] = useState<PaginatedUser>();
  const [userPayload, setUserPayload] = useState<TUserPayload>(
    defaultStoreUserRequest
  );

  useEffect(() => {
    fetchUsers().catch(console.error);
  }, []);

  const fetchUsers = async (payload?: FetchUsersRequest) => {
    const response = await UserService.fetchUsers({ ...payload });
    setUsers(response);
  };

  const handleChange = (event: React.ChangeEvent<HTMLInputElement>) => {
    if (event.target.name !== "search") {
      setUserPayload((prev) => ({
        ...prev,
        [event.target.name]: event.target.value,
      }));
    }
  };

  const onSubmit = async (event: React.FormEvent<HTMLFormElement>) => {
    event.preventDefault();

    if (userPayload?.hasOwnProperty("id") && userPayload?.id) {
      await UserService.updateUser({
        user: userPayload.id,
        updateUserRequest: userPayload,
      });
    } else {
      await UserService.createUser({ storeUserRequest: userPayload });
    }
    await fetchUsers();
    setUserPayload(defaultStoreUserRequest);
  };

  const onUserClick = async (user: TUserPayload) => {
    setUserPayload({ ...user });
  };

  const onRemoveUser = async (user: User) => {
    await UserService.deleteUser(user.id);
    await fetchUsers();
  };

  const onSearch = async (event: React.ChangeEvent<HTMLInputElement>) => {
    await fetchUsers({ q: event.target.value });
  };

  return (
    <main>
      <form onSubmit={onSubmit}>
        <input
          type="text"
          name="name"
          placeholder="name"
          value={userPayload?.name}
          onChange={handleChange}
        />
        <input
          type="text"
          name="email"
          placeholder="email"
          value={userPayload?.email}
          onChange={handleChange}
        />
        <input
          type="password"
          name="password"
          placeholder="password"
          value={userPayload?.password}
          onChange={handleChange}
        />
        <button type="submit">Submit</button>
      </form>
      <h1>
        Search user: <input type="text" onChange={onSearch} />
      </h1>
      {users?.data &&
        users?.data.map((user) => (
          <h1 key={user.id}>
            <span
              onClick={() => onUserClick(user as TUserPayload)}
              style={{ cursor: "pointer" }}
            >
              {user.email}
            </span>
            {" - "}
            <span
              style={{ cursor: "pointer", color: "red", fontSize: "12px" }}
              onClick={() => onRemoveUser(user)}
            >
              remove
            </span>
          </h1>
        ))}
      <h6>
        {users?.links &&
          users?.links.map((link) => (
            <button key={link.label}>
              <span>{link.url}</span>
            </button>
          ))}
      </h6>
    </main>
  );
}
