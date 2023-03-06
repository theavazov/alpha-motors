import { NextApiRequest, NextApiResponse } from "next";
import supabase from "../../../lib/supabase";

export default async function handleVehicles(
  req: NextApiRequest,
  res: NextApiResponse
) {
  const { id } = req.query;

  const { data, error } = await supabase
    .from("vehicles")
    .select()
    .eq("id", id)
    .single();

  if (error) {
    res.status(200).json({ message: "Nothing to fetch" });
  }

  if (data) {
    res.json(data);
  }
}
