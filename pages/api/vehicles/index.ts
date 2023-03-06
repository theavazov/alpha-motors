import { NextApiRequest, NextApiResponse } from "next";
import supabase from "../../../lib/supabase";

export default async function handleVehicles(
  req: NextApiRequest,
  res: NextApiResponse
) {
  const { data, error } = await supabase.from("vehicles").select();

  if (error) {
    res.status(200).json({ message: "Nothing to fetch" });
  }

  if (data) {
    res.json(data);
  }
}
